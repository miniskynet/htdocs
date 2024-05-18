<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Gamers United - Home</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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
			display: none; /* Initially hide the container */
			justify-content: center;
			align-items: center;
			background: #000;
		}

		#imagePreview {
			width: 100%;
			height: 100%;
			object-fit: cover;
		}

		.post {
			margin-bottom: 20px;
			padding: 10px;
			border: 1px solid #ccc;
			border-radius: 5px;
			background-color: #333;
			color: #fff;
		}

		.actions {
			margin-top: 10px;
		}

		.comments {
			margin-top: 10px;
			background-color: #444;
			padding: 10px;
			border-radius: 5px;
		}

		.comment {
			margin-bottom: 10px;
			padding: 10px;
			border: 1px solid #ccc;
			border-radius: 5px;
			background-color: #555;
			color: #fff;
		}

		.comment-form {
			margin-top: 10px;
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
		// Load posts initially
		loadPosts();

		// Event delegation for dynamic elements
		$('#posts').on('click', '.vote-up', function() {
			var postId = $(this).data('post-id');
			upvotePost(postId, $(this));
		});

		$('#posts').on('submit', '.comment-form', function(event) {
			event.preventDefault();
			var postId = $(this).data('post-id');
			var commentText = $(this).find('textarea[name="commentText"]').val();
			addComment(postId, commentText);
		});

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
					try {
						var res = JSON.parse(response);
						if (res.success) {
							alert('Post submitted successfully!');
							$('#createPostForm')[0].reset();
							$('#imagePreview').attr('src', ''); // Clear the image preview
							$('#imagePreviewContainer').hide(); // Hide the image preview container
							loadPosts();
						} else {
							alert('Failed to submit post: ' + res.message);
						}
					} catch (e) {
						console.error('Error parsing JSON response:', e);
						console.error('Response:', response);
						alert('An unexpected error occurred.');
					}
				},
				error: function(xhr, status, error) {
					console.error('AJAX error:', status, error);
					console.error('Response:', xhr.responseText);
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
							postsHtml += '<button class="vote-up" data-post-id="' + post.post_id + '"><i class="fas fa-thumbs-up"></i></button>';
							postsHtml += '<span class="upvotes-count"> Upvotes: ' + post.up_votes + '</span>';
							postsHtml += '</div>'; // Close actions div
							postsHtml += '<div class="comments" id="comments-' + post.post_id + '">';
							post.comments.forEach(function(comment) {
								postsHtml += '<div class="comment">';
								postsHtml += '<p><strong>' + comment.username + ':</strong> ' + comment.comment_text + '</p>';
								postsHtml += '</div>';
							});
							postsHtml += '<form class="comment-form" data-post-id="' + post.post_id + '">';
							postsHtml += '<textarea name="commentText" placeholder="Add a comment..." required></textarea>';
							postsHtml += '<input type="submit" value="Comment">';
							postsHtml += '</form>';
							postsHtml += '</div>'; // Close comments div
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

		function upvotePost(postId, button) {
			$.ajax({
				url: 'http://localhost/CW/index.php/home_controller/upvote_post',
				type: 'POST',
				data: { post_id: postId },
				success: function(response) {
					var res = JSON.parse(response);
					if (res.success) {
						var upvotesCountElement = button.siblings('.upvotes-count');
						upvotesCountElement.text('Upvotes: ' + res.updated_upvotes);
						button.find('i').css('color', '#5865F2');
					} else {
						alert('Failed to upvote post: ' + res.message);
					}
				},
				error: function(xhr, status, error) {
					alert('An error occurred. Please try again.');
				}
			});
		}

		function addComment(postId, commentText) {
			$.ajax({
				url: 'http://localhost/CW/index.php/home_controller/add_comment',
				type: 'POST',
				data: { post_id: postId, comment_text: commentText },
				success: function(response) {
					var res = JSON.parse(response);
					if (res.success) {
						loadPosts(); // Reload posts to show the new comment
					} else {
						alert('Failed to add comment: ' + res.message);
					}
				},
				error: function(xhr, status, error) {
					alert('An error occurred. Please try again.');
				}
			});
		}
	});

	function previewImage(event) {
		var reader = new FileReader();
		reader.onload = function() {
			var output = document.getElementById('imagePreview');
			output.src = reader.result;
			$('#imagePreviewContainer').show(); // Show the image preview container
		}
		reader.readAsDataURL(event.target.files[0]);
	}
</script>
</body>
</html>
