
function toggleShowPassword() {
  const passwordInput = document.getElementById('password');
  const showPass = document.getElementById('open');
  const hidePass = document.getElementById('close');
  
  if (passwordInput.type === 'password') {
    passwordInput.type = 'text';
    showPass.style.display = 'block';
    hidePass.style.display = 'none';
  } else {
    passwordInput.type = 'password';
    showPass.style.display = 'none';
    hidePass.style.display = 'block';
  }
}

function toggleShowConfirmPassword() {
  const passwordInput = document.getElementById('confirmPassword');
  const showPass = document.getElementById('openConfirm');
  const hidePass = document.getElementById('closeConfirm');
  
  if (passwordInput.type === 'password') {
    passwordInput.type = 'text';
    showPass.style.display = 'block';
    hidePass.style.display = 'none';
  } else {
    passwordInput.type = 'password';
    showPass.style.display = 'none';
    hidePass.style.display = 'block';
  }
}
