// const $ = document.querySelector.bind(document)
// const $$ = document.querySelectorAll.bind(document)



function validator(options) {
    function getParentInput(element, selector) {
        while(element.parentElement) {
            if(element.parentElement.matches(selector)) {
                return element.parentElement
            }
            element = element.parentElement
        }
    }
    var selectorRules ={};
    function validate(inputElement, rule) {
        var errorElement = getParentInput(inputElement, options.formGroupInput).querySelector(options.errorSelector)
        //từng test một để không bị ghi đè
        var errorMessage;
        var rules = selectorRules[rule.selector]
        for(var i=0; i< rules.length; ++i)
        {
            switch(inputElement.type) {
                case 'radio': 
                case 'checkbox': 
                    errorMessage = rules[i](
                    formElement.querySelector(rule.selector + ':checked')
                );
                    break;

                default: 
                errorMessage = rules[i](inputElement.value);
                
            }
            
            if(errorMessage) break;
        }
        
        // ------------
        if(errorMessage){
            errorElement.innerHTML = errorMessage
            getParentInput(inputElement, options.formGroupInput).classList.add('invalid')
        }
        else {
            errorElement.innerHTML = ''
            getParentInput(inputElement, options.formGroupInput).classList.remove('invalid')
        }
        return !errorMessage;
    }

    const formElement = document.getElementById(options.form)
    if(formElement)
    {
        formElement.onsubmit = function(e) {
            e.preventDefault()
            var isFormValid = true;
            options.rules.forEach(function(rule) {
                var inputElement = formElement.querySelector(rule.selector)
                var valid = validate(inputElement,rule)
                if(!valid) {
                    isFormValid = false
                }     
            })

            if(isFormValid) {
                if(typeof options.onSubmit === 'function') {
                    var enableInput = formElement.querySelectorAll('[name]')
                    var formValues = Array.from(enableInput).reduce(function(values,input) {
                        switch(input.type) {
                            case 'radio':
                                if(input.matches(':checked')){
                                    values[input.name] = input.value
                                }
                                break;
                            case 'checkbox':
                                if(!input.matches('checked')) {
                                    values[input.name] = ''
                                    return values
                                }
                                if(input.matches(':checked')){
                                    if(!Array.isArray(values[input.name])) {
                                        values[input.name] = []
                                    }
                                    values[input.name].push(input.value)
                                    
                                }
                                break;
                            case 'file':
                                values[input.name] = input.files
                                break;
                            default:
                                values[input.name] = input.value
                        }
                        return values
                    },{})
                    options.onSubmit(formValues)
                }
            }
        }
        options.rules.forEach(function(rule) {
            if(Array.isArray(selectorRules[rule.selector]))
            {
                selectorRules[rule.selector].push(rule.test)
            }
            else {
                selectorRules[rule.selector] = [rule.test]
            }
            var inputElements = formElement.querySelectorAll(rule.selector)
            Array.from(inputElements).forEach(function(inputElement) {
                inputElement.onblur = function() {
                    validate(inputElement,rule)
                }
                inputElement.oninput = function() {
                    var errorElement = getParentInput(inputElement, options.formGroupInput).querySelector(options.errorSelector)
                    errorElement.innerHTML = ''
                    getParentInput(inputElement, options.formGroupInput).classList.remove('invalid')
                }

            })
        })
        
    }

}

validator.isRequired = function(selector, messageType) {
    return { 
        selector: selector,
        test: function(value) {
            return value ? undefined : messageType || 'Vui lòng nhập trường này'
        }
    }
    
}

validator.isEmail = function(selector, messageType) {
    return {
        selector: selector,
        test: function(value) {
            const regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/
            return regex.test(value) ? undefined : messageType || 'Trường này phải là email'
        }
    }
}

validator.isMinLength = function(selector, minPass) {
    return {
        selector: selector,
        test: function(value) {
            return value.length >= minPass ? undefined : ` Mật khẩu phải dài hơn ${minPass} ký tự`
        }
    }
}

validator.isConfirm = function(selector, getConfirmvalue) {
    return {
        selector: selector,
        test: function(value) {
            return value === getConfirmvalue() ? undefined : "Giá trị nhập vào không chính xác"
        }
    }
}

