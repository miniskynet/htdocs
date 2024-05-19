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

		.nav-middle {
			flex: 1;
			display: flex;
			justify-content: center;
			align-items: center;
		}

		.nav-middle input[type="text"] {
			padding: 5px;
			border: 1px solid #ccc;
			border-radius: 5px;
			width: 200px;
		}

		.nav-middle button {
			color: #fff;
			background-color: #5865F2;
			padding: 5px 10px;
			border-radius: 5px;
			border: none;
			cursor: pointer;
			margin-left: 10px;
		}

		.nav-buttons {
			display: flex;
			gap: 10px;
		}

		.nav-buttons a {
			color: #fff;
			background-color: #5865F2;
			padding: 10px 15px;
			border-radius: 5px;
			text-decoration: none;
			display: flex;
			align-items: center;
			justify-content: center;
		}

		.nav-buttons a i {
			margin-right: 5px;
		}

		#imagePreviewContainer {
			overflow: hidden;
			margin: 10px;
			border: 3px solid #33b249;
			display: none;
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

		.profile-container {
			display: flex;
			flex-direction: column;
			align-items: center; /* Centering the profile container */
			text-align: center;
			color: #fff;
			background-color: #1e1e1e;
			padding: 30px;
			margin: 20px auto;
			width: 60%;
			box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.4);
			border-radius: 15px;
			border: 3px solid #33b249;
		}

		.profile-picture {
			width: 150px;
			height: 150px;
			border-radius: 50%;
			background-color: #5865F2;
			display: flex;
			justify-content: center;
			align-items: center;
			border: 5px solid #33b249;
			margin-bottom: 20px;
		}

		.user-icon {
			color: #fff;
			font-size: 100px;
		}

		.profile-container h2 {
			margin-bottom: 20px;
			color: #33b249;
		}

		.profile-container p {
			margin: 10px 0;
			color: #fff;
		}

		.profile-container p strong {
			color: #33b249;
		}

	</style>
</head>
<body>

<div id="nav">
	<!-- Add the home button -->
	<div class="nav-buttons" id="homeButton" style="display: none;">
		<a href="#"><i class="fas fa-home"></i>Home</a>
	</div>
	<!-- search field to filter content based on keyword -->
	<div class="nav-middle">
		<input type="text" id="searchInput" placeholder="Search posts...">
		<button id="searchButton"><i class="fas fa-search"></i> Search</button>
	</div>
	<!-- buttons to go to user profile or logout -->
	<div class="nav-buttons">
		<a href="#" id="profileButton"><i class="fas fa-user"></i>Profile</a>
		<a href="http://localhost/CW/index.php/home_controller/logout" id="logoutButton"><i class="fas fa-sign-out-alt"></i>Logout</a>
	</div>
</div>

<div id="container">
	<div id="postForm">
		<h2>Create a Post</h2>
		<!--gives user form fields to create a post-->
		<form id="createPostForm">
			<textarea name="postText" placeholder="What are you up to?" required></textarea>
			<textarea name="gameName" placeholder="What game are you playing?" required></textarea>
			<!--preview image when uploaded-->
			<div id="imagePreviewContainer">
				<img id="imagePreview" />
			</div>
			<input type="file" name="postImage" accept="image/*" onchange="previewImage(event)">
			<input type="submit" value="Post">
		</form>
	</div>

	<!--container to load posts-->
	<div id="postsContainer">
		<h2>Recent Posts</h2>
		<div id="posts"></div>
	</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
	//make sure the page is fully loaded
	$(document).ready(function() {
		//initially load the posts
		loadPosts();

		//trigger the controller method to vote
		$('#posts').on('click', '.vote-up', function() {
			var postId = $(this).data('post-id');
			upvotePost(postId, $(this));
		});

		//adds comment to relevant post based on post id
		$('#posts').on('submit', '.comment-form', function(event) {
			event.preventDefault();
			var postId = $(this).data('post-id');
			var commentText = $(this).find('textarea[name="commentText"]').val();
			addComment(postId, commentText);
		});

		$('#createPostForm').submit(function(event) {
			event.preventDefault();

			var formData = new FormData(this);
			//create and send the AJAX request with post details
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
							//reset the form fields and hide the image preview container
							$('#createPostForm')[0].reset();
							$('#imagePreview').attr('src', '');
							$('#imagePreviewContainer').hide();
							//if successful reload the posts
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

		//on click send the keyword to searchPosts function
		$('#searchButton').click(function() {
			var query = $('#searchInput').val();
			searchPosts(query);
		});

		function loadPosts() {
			//retrieve the posts using AJAX
			$.ajax({
				url: 'http://localhost/CW/index.php/home_controller/get_posts',
				type: 'GET',
				success: function(response) {
					var res = JSON.parse(response);
					if (res.success) {
						//if posts are successfully, retrieved display them
						displayPosts(res.posts);
					} else {
						$('#posts').html('<p>No posts found.</p>');
					}
				},
				error: function(xhr, status, error) {
					$('#posts').html('<p>An error occurred while loading posts. Please try again.</p>');
				}
			});
		}

		function searchPosts(query) {
			//retrieve the posts based on user search keyword
			$.ajax({
				url: 'http://localhost/CW/index.php/home_controller/search_posts',
				type: 'GET',
				data: { query: query },
				success: function(response) {
					var res = JSON.parse(response);
					if (res.success) {
						//if posts successfully retrieved, display them
						displayPosts(res.posts);
					} else {
						$('#posts').html('<p>No posts found for your search.</p>');
					}
				},
				error: function(xhr, status, error) {
					$('#posts').html('<p>An error occurred while searching posts. Please try again.</p>');
				}
			});
		}

		function displayPosts(posts) {
			//create html content for each post
			var postsHtml = '';
			posts.forEach(function(post) {
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
				postsHtml += '</div>';
				postsHtml += '<div class="comments" id="comments-' + post.post_id + '">';
				//populate each post with its respective commments
				post.comments.forEach(function(comment) {
					postsHtml += '<div class="comment">';
					postsHtml += '<p><strong>' + comment.username + ':</strong> ' + comment.comment_text + '</p>';
					postsHtml += '</div>';
				});
				postsHtml += '<form class="comment-form" data-post-id="' + post.post_id + '">';
				postsHtml += '<textarea name="commentText" placeholder="Add a comment..." required></textarea>';
				postsHtml += '<input type="submit" value="Comment">';
				postsHtml += '</form>';
				postsHtml += '</div>';
				postsHtml += '</div>';
			});
			//populate the div section with created html content
			$('#posts').html(postsHtml);
		}

		function upvotePost(postId, button) {
			//send AJAX request to upvote post
			$.ajax({
				url: 'http://localhost/CW/index.php/home_controller/upvote_post',
				type: 'POST',
				data: { post_id: postId },
				success: function(response) {
					var res = JSON.parse(response);
					if (res.success) {
						//if successful, update the votes count in real time
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
			//send AJAX request to add comment to the respective post
			$.ajax({
				url: 'http://localhost/CW/index.php/home_controller/add_comment',
				type: 'POST',
				data: { post_id: postId, comment_text: commentText },
				success: function(response) {
					var res = JSON.parse(response);
					if (res.success) {
						//if comment added successfully added, reload the posts
						loadPosts();
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

	//preview the user uploaded post image in a container
	function previewImage(event) {
		var reader = new FileReader();
		reader.onload = function() {
			var output = document.getElementById('imagePreview');
			output.src = reader.result;
			//once loaded, show the container which is hidden by default
			$('#imagePreviewContainer').show();
		}
		reader.readAsDataURL(event.target.files[0]);
	}
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.13.1/underscore-min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/backbone.js/1.4.0/backbone-min.js"></script>
<script>
	//define the user model
	var User = Backbone.Model.extend({
		defaults: {
			id: null,
			username: '',
			email: ''
		},
		urlRoot: 'http://localhost/CW/index.php/home_controller/user_profile'
	});

	//define the user profile view
	var UserProfileView = Backbone.View.extend({
		el: '#container',
		//create the template for the user profile
		template: _.template(`
        <div id="userProfile" class="profile-container">
            <h2>User Profile</h2>
            <div class="profile-picture">
                <i class="fas fa-user user-icon"></i>
            </div>
            <p><strong>Username:</strong> <%= username %></p>
            <p><strong>Email:</strong> <%= email %></p>
            <p><strong>First Name:</strong> <%= first_name %></p>
            <p><strong>Last Name:</strong> <%= last_name %></p>
            <p><strong>User ID:</strong> <%= id %></p>
            <p><strong>Profile created on:</strong> <%= created_at %></p>
        </div>
    `),
		initialize: function(options) {
			//hide home page elements
			$('#profileButton').hide();
			$('#searchInput').hide();
			$('#searchButton').hide();

			this.user = new User({ id: options.userId });
			this.listenTo(this.user, 'sync', this.render);
			this.user.fetch();
		},
		render: function() {
			this.$el.html(this.template(this.user.toJSON()));
			return this;
		}
	});

	//define the router
	var AppRouter = Backbone.Router.extend({
		routes: {
			'user/:id': 'userProfile'
		},
		userProfile: function(id) {
			new UserProfileView({ userId: id });
		}
	});

	//initialize the router
	var appRouter = new AppRouter();
	Backbone.history.start();

	//navigate to user profile when profile button is clicked
	$('#profileButton').click(function(e) {
		e.preventDefault();
		var userId = <?php echo json_encode($_SESSION['user_id']); ?>;
		appRouter.navigate('user/' + userId, { trigger: true });

		//show the hidden home button
		$('#homeButton').show();
	});

	$('#homeButton a').click(function(e) {
		e.preventDefault();
		//reload the page
		window.location.href = 'http://localhost/CW/index.php/welcome_controller/home';
	});

</script>
</body>
</html>
