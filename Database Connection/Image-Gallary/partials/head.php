<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
  <title><?php echo $title; ?></title>
  <style>
    #root {
      min-height: 100dvh;
    }

    <?php if (isset($_GET["msg"])) : ?>#alert {
      background-color: green;
      color: white;
      border-radius: 10px;
      width: fit-content;
      padding: 6px;
      position: absolute;
      top: 8px;
      margin-inline: auto;
      animation: showAlert 5000ms linear 0.5s 1 forwards;
      opacity: 0;
    }

    @keyframes showAlert {

      0%,
      100% {
        opacity: 0;
      }

      10%,
      90% {
        opacity: 100%;
      }
    }

    <?php endif; ?>
  </style>
</head>