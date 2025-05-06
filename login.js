<script>
    document.querySelector("form").addEventListener("submit", function(e) {
    const email = document.getElementById("email").value;
    const pass = document.getElementById("password").value;

    if (!email || !pass) {
      e.preventDefault();
      alert("Por favor, completa todos los campos.");
    }
  });
</script>