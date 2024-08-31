<script>
        // Function to fetch and update the tumbuhan card
        function updateTumbuhan() {
            fetch('get_random_tumbuhan.php')
                .then(response => response.json())
                .then(data => {
                    // Update card content
                    document.querySelector('.card-image').src = '../images/' + data.foto;
                    document.querySelector('.card-title').textContent = data.nama_umum;
                    document.querySelector('.card-subtitle').textContent = data.nama_ilmiah;
                    document.querySelector('.card-description').textContent = data.deskripsi;
                })
                .catch(error => console.error('Error fetching tumbuhan:', error));
        }

        // Update tumbuhan every 5 seconds (5000 milliseconds)
        setInterval(updateTumbuhan, 5000);

        // Fetch the first tumbuhan immediately
        document.addEventListener('DOMContentLoaded', updateTumbuhan);
    </script>

<?php include '../includes/header.php'; ?>
<?php include '../includes/sidebar.php'; ?>
<link rel="stylesheet" href="../assets/css/style.css">

<div class="main-content">
        <div class="card">
            <div class="card-image-container">
                <img src="" alt="" class="card-image">
            </div>
            <div class="card-content">
                <div class="card-title"></div>
                <div class="card-subtitle"></div>
                <div class="card-description"></div>
            </div>
        </div>
    </div>

<?php include '../includes/footer.php'; ?>