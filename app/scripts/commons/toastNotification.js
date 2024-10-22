function toast(title, message, type) {
  let toastContainer = document.getElementById('toast-container');
  if (!toastContainer) {
    toastContainer = document.createElement('div');
    toastContainer.id = 'toast-container';
    toastContainer.classList.add('fixed', 'top-4', 'right-4', 'space-y-4', 'z-50');
    document.body.appendChild(toastContainer);
  }

  const toast = document.createElement('div');
  toast.classList.add('p-4', 'rounded-lg', 'shadow-lg', 'max-w-xs', 'text-white');

  if (type === 'success') {
    toast.classList.add('bg-green-500');
  } else if (type === 'error') {
    toast.classList.add('bg-red-500');
  } else if (type === 'info') {
    toast.classList.add('bg-blue-500');
  } else {
    toast.classList.add('bg-gray-500');
  }

  const toastTitle = document.createElement('div');
  toastTitle.classList.add('font-bold', 'mb-1');
  toastTitle.innerText = title;

  const toastMessage = document.createElement('div');
  toastMessage.innerText = message;

  toast.appendChild(toastTitle);
  toast.appendChild(toastMessage);

  toastContainer.appendChild(toast);

  setTimeout(() => {
    toast.remove();
  }, 3000);
}
