<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PDF Modal Example</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Navbar (Optional) -->
<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Digital Marketing Portal</a>
  </div>
</nav>

<!-- Container -->
<div class="container">
    <h2 class="mb-3">Assignments</h2>
    <p>Click below to view the assignment PDF in a modal:</p>

    <!-- Button to open modal -->
    <a href="javascript:void(0)" class="btn btn-primary mb-3" onclick="openPdfModal(101)">View Assignment PopUp</a>
    <a href="javascript:void(0)" class="btn btn-primary mb-3" onclick="showPdfInline(101)">View Assignment Inline</a>

    <!-- Div to show PDF -->
    <div id="pdfContainer" class="border" style="width:100%; height:600px;">
        <p class="text-center mt-5">PDF will be displayed here...</p>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="pdfModal" tabindex="-1" aria-labelledby="pdfModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="pdfModalLabel">Assignment PDF Preview</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-0">
        <iframe id="pdfFrame" style="width:100%; height:80vh; border:none;"></iframe>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap 5 JS + Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    function openPdfModal(studentId) {
        let url = "{{url('/assignment-pdf')}}"+ '/' + studentId;

        // Set PDF URL to iframe
        document.getElementById('pdfFrame').src = url;

        // Open modal using Bootstrap 5 JS
        let pdfModal = new bootstrap.Modal(document.getElementById('pdfModal'));
        pdfModal.show();
    }
    function showPdfInline(studentId) {
        let url = "{{url('/assignment-pdf')}}"+ '/' + studentId;

        // Create iframe inside the div
        let container = document.getElementById('pdfContainer');
        container.innerHTML = '<iframe src="' + url + '" style="width:100%; height:100%; border:none;"></iframe>';
    }
</script>

</body>
</html>