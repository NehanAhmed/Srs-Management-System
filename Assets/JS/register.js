document.querySelectorAll('.radio-card input').forEach((radio) => {
    radio.addEventListener('change', () => {
      const selectedRole = document.querySelector('input[name="role"]:checked').value;
      document.getElementById('selected-role').textContent = `Selected Role: ${selectedRole}`;
    });
  });
  