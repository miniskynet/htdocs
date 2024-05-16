<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Gamers United - Home</title>
	<style type="text/css">
		body {
			background-color: #202225;
			margin: 40px;
			font: 13px/20px 'Orbitron', sans-serif;
			color: #4F5155;
		}

		a {
			color: #33b249;
			background-color: transparent;
			font-weight: normal;
			text-decoration: none;
			transition: color 0.3s ease;
		}

		a:hover {
			color: #5865F2;
		}

		#container {
			margin: 10px;
			display: flex;
			justify-content: center;
			flex-direction: column;
		}

		#postForm {
			width: 60%;
			padding: 30px;
			margin: 20px auto;
			background-color: #1e1e1e;
			color: #fff;
			box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.4);
			border-radius: 15px;
			border: 3px solid #33b249;
			font-family: 'Orbitron', sans-serif;
			text-align: center;
		}

		#postsContainer {
			width: 60%;
			margin: 20px auto;
			background-color: #1e1e1e;
			color: #fff;
			padding: 20px;
			box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.4);
			border-radius: 15px;
			border: 3px solid #33b249;
		}

		h1, h2, p, label {
			color: #fff;
		}

		form input[type="text"],
		form input[type="file"],
		form textarea {
			width: 100%;
			padding: 10px;
			margin: 10px 0;
			border: 1px solid #ccc;
			border-radius: 5px;
		}

		form input[type="submit"] {
			color: #fff;
			background-color: #5865F2;
			padding: 12px 20px;
			border-radius: 5px;
			cursor: pointer;
		}

		#nav {
			background-color: #202225;
			color: #fff;
			padding: 10px 20px;
			display: flex;
			align-items: center;
			justify-content: space-between;
			font-family: 'Orbitron', sans-serif;
			border-bottom: 3px solid #33b249;
		}

		#imagePreviewContainer {
			overflow: hidden;
			margin: 10px;
			border: 3px solid #33b249;
			display: flex;
			justify-content: center;
			align-items: center;
			background: #000;
		}

		#imagePreview {
			width: 100%;
			height: 100%;
			object-fit: cover;
		}

	</style>
</head>
<body>

<div id="nav">
	<h1>Welcome to Gamers United!</h1>
</div>

<div id="container">
	<div id="postForm">
		<h2>Create a Post</h2>
		<form id="createPostForm">
			<textarea name="postText" placeholder="What are you up to?" required></textarea>
			<textarea name="gameName" placeholder="What game are you playing?" required></textarea>
			<div id="imagePreviewContainer">
				<img id="imagePreview" />
			</div>
			<input type="file" name="postImage" accept="image/*" onchange="previewImage(event)">
			<input type="submit" value="Post">
		</form>
	</div>

	<div id="postsContainer">
		<h2>Recent Posts</h2>
		<div id="posts"></div>
	</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
	$(document).ready(function() {
		$('#createPostForm').submit(function(event) {
			event.preventDefault();

			var formData = new FormData(this);
			$.ajax({
				type: 'POST',
				url: 'http://localhost/CW/index.php/home_controller/submit_post',
				data: formData,
				contentType: false,
				processData: false,
				success: function(response) {
					var res = JSON.parse(response);
					if (res.success) {
						alert('Post submitted successfully!');
						$('#createPostForm')[0].reset();
						loadPosts();
					} else {
						alert('Failed to submit post: ' + res.message);
					}
				},
				error: function(xhr, status, error) {
					alert('An error occurred. Please try again.');
				}
			});
		});

		function loadPosts() {
			$.ajax({
				url: 'http://localhost/CW/index.php/home_controller/get_posts',
				type: 'GET',
				success: function(response) {
					var res = JSON.parse(response);
					if (res.success) {
						var postsHtml = '';
						res.posts.forEach(function(post) {
							postsHtml += '<div class="post">';
							postsHtml += '<p><strong>' + post.username + ':</strong></p>';
							postsHtml += '<p>' + post.text + '</p>';
							postsHtml += '<p><strong>Game:</strong> ' + post.game_name + '</p>';
							if (post.image) {
								postsHtml += '<img src="' + post.image + '" alt="Post Image" style="width: 100%;">';
							}
							postsHtml += '<div class="actions">';
							postsHtml += '<button class="vote-up" data-post-id="' + post.id + '">Upvote</button>';
							postsHtml += '<button class="comment" data-post-id="' + post.id + '">Comment</button>';
							postsHtml += '</div>'; // Close actions div
							postsHtml += '<div class="comments" id="comments-' + post.id + '"></div>'; // Empty div for comments
							postsHtml += '</div>'; // Close post div
						});
						$('#posts').html(postsHtml);
					} else {
						$('#posts').html('<p>No posts found.</p>');
					}
				},
				error: function(xhr, status, error) {
					$('#posts').html('<p>An error occurred while loading posts. Please try again.</p>');
				}
			});
		}

		loadPosts();
	});

	function previewImage(event) {
		var reader = new FileReader();
		reader.onload = function() {
			var output = document.getElementById('imagePreview');
			output.src = reader.result;
		};
		reader.readAsDataURL(event.target.files[0]);
	}

</script>

</body>
</html>
