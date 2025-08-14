<?php 


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Tmail</title>
  <link
    href="https://cdn.jsdelivr.net/npm/@coreui/coreui@5.4.1/dist/css/coreui.min.css"
    rel="stylesheet"
    integrity="sha384-NlsxdkweGA8nr9s0TVc3Qu2zqhWMNsHrvzMpAjVR0yDqXgC2z+RWYoeCNG2uO2MC"
    crossorigin="anonymous" />
  <script
    src="https://cdn.jsdelivr.net/npm/@coreui/coreui@5.4.1/dist/js/coreui.bundle.min.js"
    integrity="sha384-A/PJYVqbBIxVQjEeGNq+sol2Ti2m1CIs9UqTU4QAPHMm+4V/Qzov2cZYatOxoVgf"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="style.css" />
</head>

<body>
  <div id="root" class="min-vh-100 d-flex">
    <!-- view control inputs -->
    <input
      type="radio"
      name="nav-radio"
      value="Sent"
      id="sent"
      class="d-none"
      checked />
    <input
      type="radio"
      name="nav-radio"
      value="drafts"
      id="drafts"
      class="d-none" />
    <!-- sidebar -->
    <div class="sidebar border-end bg-primary bg-gradient">
      <div class="sidebar-header border-bottom">
        <div class="sidebar-brand fs-4 text-white fw-bold">✉️ Tmail</div>
      </div>
      <ul class="sidebar-nav">
        <li class="nav-item">
          <label for="sent" class="nav-link active" role="button">
            <i class="nav-icon cil-speedometer"></i> Sent
          </label>
        </li>
        <li class="nav-item mt-1">
          <label for="drafts" class="nav-link" role="button">
            <i class="nav-icon cil-speedometer"></i> Drafts
          </label>
        </li>
      </ul>
      <div class="sidebar-footer border-top d-flex text-white">
        &copy;copyright 2025
      </div>
    </div>
    <!-- main area -->
    <main class="flex-grow-1 position-relative p-5">
      <!-- sent mails -->
      <div class="w-100 h-100 d-none" id="sentmails">
        <h2 class="text-primary mb-3">➤ Sent Emails</h2>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">An item</li>
          <li class="list-group-item">A second item</li>
          <li class="list-group-item">A third item</li>
          <li class="list-group-item">A fourth item</li>
          <li class="list-group-item">And a fifth one</li>
        </ul>
      </div>
      <!-- draft mails -->
      <div class="w-100 h-100 d-none" id="draftmails">
        <h2 class="text-primary mb-3">➤ Drafts</h2>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">An item</li>
          <li class="list-group-item">A second item</li>
          <li class="list-group-item">A third item</li>
          <li class="list-group-item">A fourth item</li>
          <li class="list-group-item">And a fifth one</li>
        </ul>
      </div>
    </main>
  </div>
  <!-- compose button -->
  <button
    type="button"
    class="btn btn-primary position-absolute bottom-0 end-0 z-3 px-4 py-2 fs-5 shadow"
    id="compose"
    data-coreui-toggle="modal"
    data-coreui-target="#composeMail">
    Compose
  </button>
  <!-- mail modal -->
  <div
    class="modal fade"
    id="composeMail"
    tabindex="-1"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Compose Mail</h5>
          <button
            type="button"
            class="btn-close"
            data-coreui-dismiss="modal"
            aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form
            id="composeMailForm"
            method="post"
            enctype="multipart/form-data">
            <div class="mb-3">
              <label for="To" class="form-label">To</label>
              <input
                type="email"
                class="form-control"
                id="To"
                name="to"
                aria-describedby="emailHelp"
                placeholder="Recipent email.."
                required />
            </div>
            <div class="mb-3">
              <label for="subject" class="form-label">Subject</label>
              <input
                type="text"
                id="subject"
                name="subject"
                class="form-control"
                placeholder="Subject..."
                required />
            </div>
            <div class="mb-3">
              <label for="body" class="form-label">Subject</label>
              <textarea
                id="body"
                name="body"
                class="form-control"
                placeholder="Content here..."
                required></textarea>
            </div>
            <input
              type="file"
              id="files"
              name="files[]"
              multiple
              class="form-control d-none"
              required />
          </form>
        </div>
        <div class="modal-footer position-relative">
          <div class="flex-grow-1 d-flex gap-2 align-items-center">
            <button
              id="attachment"
              type="button"
              data-coreui-toggle="tooltip"
              data-coreui-placement="top"
              data-coreui-custom-class="custom-tooltip"
              data-coreui-title="add an attachment"
              class="btn">
              🔗
            </button>
            <span id="fileCount" class="fw-semibold">No file Choosen</span>
          </div>
          <button
            type="button"
            class="btn btn-secondary"
            data-coreui-dismiss="modal">
            Cancel
          </button>
          <button
            class="btn btn-primary submit">
            Send Mail
          </button>
        </div>
      </div>
    </div>
  </div>

  <script src="script.js"></script>
</body>

</html>