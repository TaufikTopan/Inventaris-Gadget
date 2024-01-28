<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inks</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="image-container">
            <div class="image">
                <img src="../img/adhxm.png" alt="anjir">
            </div>
        </div>
        <div class="popup-image">
            <span>&times;</span>
            <img src="../img/adhxm.png" alt="">
        </div>
    </div>
    <script>
        document.querySelectorAll('.image-container img').forEach(image =>{
            image.onclick = () => {
                document.querySelector('.popup-image').style.display = 'block';
                document.querySelector('.popup-image img').src = image.getAttribute('src');
            }
        });

        document.querySelector('.popup-image span').onclick = () =>{
            document.querySelector('.popup-image').style.display = 'none';
        }
    </script>
</body>
</html>