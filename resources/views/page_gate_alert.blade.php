<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Alert</title>
</head>
<body>
    <div style="text-align:center; width: 100%; margin-top: 150px;">
        <img src="/images/dog.jpg" style="width: 200px">
        <p style="font-size: 9mm;">You don't have permissions. You aren't admin.</p>
        <button onclick="goBack()">Go Back</button>

        <script>
            function goBack() {
                window.history.back();
            }
        </script>
    </div>
</body>
</html>