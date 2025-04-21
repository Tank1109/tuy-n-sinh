document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll('.toggle-title').forEach(function(title) {
      title.addEventListener('click', function() {
        const details = this.nextElementSibling;
        const icon = this.querySelector('span');
        const postItem = this.closest('.post-item');
        const imageDiv = postItem.querySelector('.post-image');
  
        const isOpen = details.style.display === 'block';
  
        // Ẩn hiện nội dung và ảnh
        details.style.display = isOpen ? 'none' : 'block';
        icon.textContent = isOpen ? '▼' : '▲';
        imageDiv.style.display = isOpen ? 'block' : 'none';
      });
    });
  });
  
  