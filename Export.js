const form = document.querySelector("form");
const errorElement = document.getElementById("error");

form.addEventListener('submit', (e) => {
    let messages = [];
    
    const inputs = form.querySelectorAll('input, select, textarea');

    inputs.forEach(input => {
        const inputValue = input.value.trim(); 

     
        if (inputValue === '' || inputValue === null) {
            messages.push(`${input.name} is required`);
        }

    
        switch(input.name) {
            case 'Cname':
                if (inputValue.length <= 4) {
                    messages.push(`${input.name} should be longer than 4 characters`);
                }
                if (!/^[A-Z]/.test(inputValue)) {
                    messages.push(`${input.name} should start with an uppercase letter`);
                }
                if (!/\d/.test(inputValue)) {
                    messages.push(`${input.name} should contain at least 1 digit`);
                }
                break;
            case 'pName': 
                if (inputValue.length <= 4) {
                    messages.push(`${input.name} should be longer than 4 characters`);
                }
                break;
            case 'eCountry':
                if (inputValue.length <= 4) {
                    messages.push(`${input.name} should be longer than 4 characters`);
                }
                break;
            case 'Price': 
                if (isNaN(inputValue)) {
                    messages.push(`${input.name} should be a valid number`);
                }
                break;
            case 'image': 
                const file = input.files[0];
                const allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
                if (!file) {
                    messages.push(`Please select an image`);
                } else if (!allowedExtensions.test(file.name)) {
                    messages.push(`Invalid file type. Only JPG, JPEG, PNG, or GIF files are allowed.`);
                }
                break;
        }
    });

   
    if (messages.length > 0) {
        e.preventDefault();
        errorElement.innerText = messages.join(', ');
    } else {
        errorElement.innerText = ''; // Clear any previous error messages
    }
});
