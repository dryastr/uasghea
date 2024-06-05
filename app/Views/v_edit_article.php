<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Artikel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-top: 50px;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }

        input[type="text"], textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        textarea {
            height: 150px;
            resize: vertical;
        }

        button {
            padding: 10px 15px;
            background-color: #1cbbb4;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            display: inline-block;
            font-size: 16px;
        }

        button:hover {
            background-color: #17a2a0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Artikel</h1>
        <form method="post" action="<?= base_url('admin/article/edit/'.$article['post_id']) ?>">
            <label for="post_title">Judul</label>
            <input type="text" name="post_title" id="post_title" value="<?= $article['post_title'] ?>" required>
            
            <label for="post_status">Status</label>
            <input type="text" name="post_status" id="post_status" value="<?= $article['post_status'] ?>" required>
            
            <label for="post_description">Deskripsi</label>
            <textarea name="post_description" id="post_description" required><?= $article['post_content'] ?></textarea>
            
            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>
