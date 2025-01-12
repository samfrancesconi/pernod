const setAge = year => {
    const currentYear = new Date().getFullYear()
    const rememberMe = document.getElementById('remember-age')
    const tooYoung = document.getElementById('too-young')
    const limitAge = 18
    const storage = rememberMe.checked ? localStorage : sessionStorage
    let data = {}

    if(year > 1900 && year < (currentYear - limitAge)) {
        data = {
            age: currentYear - year,
            dateOfBirth: {
                year: year,
                month: null,
                day: null
            },
            passed: true
        }

        tooYoung.classList.add('hidden')
    }
    else {
        data = { passed: false }

        tooYoung.classList.remove('hidden')

        setTimeout(() => {
            location.href = 'https://www.wise-drinking.com/'
        }, 1000)
    }

    storage.setItem('ageGatePassed', JSON.stringify(data))

    checkAge();
}

const checkAge = () => {
    const ageValue = localStorage.getItem('ageGatePassed') ? JSON.parse(localStorage.getItem('ageGatePassed')) : JSON.parse(sessionStorage.getItem('ageGatePassed'))
    const ageGate = document.getElementById('age-gate')

    if(! ageValue || ! ageValue.passed) {
        ageGate.classList.remove('hidden')
    }
    else {
        ageGate.classList.add('hidden')
    }
}

checkAge()

const ageInput = document.getElementById('age-input')

ageInput.addEventListener('input', e => {
    const value = parseInt(e.target.value)

    if(e.target.value.length === 4 && Number.isInteger(value)) {
        setAge(value)
    }
})
