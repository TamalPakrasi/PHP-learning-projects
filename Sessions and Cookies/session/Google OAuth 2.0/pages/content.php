<?php

declare(strict_types=1);

session_start();

include_once __DIR__ . "/../handlers/message.php";

if (empty($_SESSION["username"]) || empty($_SESSION["email"])) {
  set_message("Please Log in to access this page");
  header("Location: signin.php");
  die();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <title>Content</title>
</head>

<body>
  <div id="root" class="min-vh-100 bg-body-tertiary position-relative d-flex flex-column">
    <?php include_once __DIR__ . "/../components/navbar.php"; ?>
    <main class="card mb-4 flex-grow-1">
      <div class="card-body">
        <div class="d-flex align-items-start gap-3">
          <img src="https://placehold.co/400" alt="avatar" class="rounded-circle" width="48" height="48">
          <div class="flex-grow-1">
            <div class="d-flex justify-content-between align-items-start">
              <div>
                <h6 class="mb-0">Jane Doe <small class="text-muted fw-normal">· 2h</small></h6>
                <p class="mb-1 text-muted small">San Francisco · Public</p>
              </div>
              <button class="btn btn-sm btn-light" type="button" aria-label="post options">•••</button>
            </div>

            <p class="mb-3">Had a great time exploring the city today — coffee, books, and sunshine. ☕️🌞</p>

            <div class="ratio ratio-16x9 mb-3">
              <img src="https://placehold.co/850x400" alt="post image" class="w-100 h-100 object-fit-cover">
            </div>

            <div class="d-flex align-items-center mb-2">
              <div class="me-3">
                <span class="badge bg-primary rounded-pill">👍 128</span>
              </div>
              <div class="text-muted small">34 comments · 12 shares</div>
            </div>

            <div class="d-flex gap-2 border-top pt-2">
              <button class="btn btn-light flex-fill d-flex align-items-center justify-content-center gap-2" type="button">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hand-thumbs-up" viewBox="0 0 16 16">
                  <path d="M6.956 1.745C7.021.81 7.908.22 8.864.493l4.01 1.356c.858.29 1.29 1.24.95 2.02l-1.27 2.84c-.16.358-.147.76.036 1.11.558 1.12.12 2.49-1.03 3.113l-1.644.84c-.79.403-1.74-.01-2.04-.84l-.59-1.5H3.5A1.5 1.5 0 0 1 2 9.33V4.5A1.5 1.5 0 0 1 3.5 3h2.69l.266-1.255z" />
                </svg>
                Like
              </button>
              <button class="btn btn-light flex-fill d-flex align-items-center justify-content-center gap-2" type="button">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat" viewBox="0 0 16 16">
                  <path d="M2.678 11.894a1 1 0 0 1 .26-.016H3.5c.512 0 1.02.075 1.5.223V14l2-1h5.5A1.5 1.5 0 0 0 14 10.5v-7A1.5 1.5 0 0 0 12.5 2h-9A1.5 1.5 0 0 0 2 3.5v6c0 .373.135.714.356.994z" />
                </svg>
                Comment
              </button>
              <button class="btn btn-light flex-fill d-flex align-items-center justify-content-center gap-2" type="button">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-share" viewBox="0 0 16 16">
                  <path d="M11 2.5a2.5 2.5 0 1 0-2.45 3.12l-4.05 2.028A2.5 2.5 0 1 0 6 11.5l4.05-2.028A2.5 2.5 0 1 0 11 2.5z" />
                </svg>
                Share
              </button>
            </div>

            <form class="mt-3">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Write a comment..." aria-label="Write a comment">
                <button class="btn btn-primary" type="submit">Post</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </main>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>