<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Dashboard</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <!-- Header -->
    <header class="text-center mb-5">
      <h1>User Dashboard</h1>
      <p class="lead">Welcome to your competition dashboard</p>
    </header>

    <!-- Team Information -->
    <section class="mb-5">
      <h2>Team Information</h2>
      <div class="card">
        <div class="card-body">
          <p><strong>Team Name:</strong> <span id="team-name"> {{ $user->team_name }}</span></p>
          <p><strong>Leader Name:</strong> <span id="leader-name"> {{ $user->leader_name }}</span></p>
          <p><strong>Leader Email:</strong> <span id="leader-email"> {{ $user->leader_email }}</span></p>
          <p><strong>Leader WhatsApp:</strong> <span id="leader-whatsapp"> {{ $user->leader_whatsapp }}</span></p>
          <p><strong>Leader Line ID:</strong> <span id="leader-line"> {{ $user->leader_line }}</span></p>
        </div>
      </div>
    </section>

    <!-- CV and ID Card Section -->
    <section class="mb-5">
      <h2>Documents</h2>
      <div class="row">
        <div class="col-md-6 mb-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">CV</h5>
              <p class="card-text">View or download the uploaded CV.</p>
              <<button class="btn btn-primary" onclick="viewCV('{{ asset('storage/leader_cv/' . $user->leader_cv) }}')">View CV</button>
              <button class="btn btn-secondary" onclick="downloadCV('{{ asset('storage/leader_cv/' . $user->leader_cv) }}')">Download CV</button>

            </div>
          </div>
        </div>
        <div class="col-md-6 mb-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">ID Card / Flazz Card</h5>
              <p class="card-text">View or download the uploaded ID Card.</p>
              <button class="btn btn-primary" onclick="viewIDCard('{{ asset('storage/leader_card/' . $user->leader_card) }}')">View ID Card</button>
              <button class="btn btn-secondary" onclick="downloadIDCard('{{ asset('storage/leader_card/' . $user->leader_card) }}')">Download ID Card</button>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Timeline Section -->
    <section class="mb-5">
      <h2>Timeline</h2>
      <ul class="list-group">
        <li class="list-group-item">
          <strong>Open Registration:</strong> <span id="open-registration">Date</span>
        </li>
        <li class="list-group-item">
          <strong>Close Registration:</strong> <span id="close-registration">Date</span>
        </li>
        <li class="list-group-item">
          <strong>Technical Meeting:</strong> <span id="technical-meeting">Date</span>
        </li>
        <li class="list-group-item">
          <strong>Competition Day:</strong> <span id="competition-day">Date</span>
        </li>
      </ul>
    </section>

    <!-- Contact Person Section -->
    <section class="mb-5">
      <h2>Contact Person</h2>
      <div class="card">
        <div class="card-body">
          <p><strong>Name:</strong> <span id="contact-name">test</span></p>
          <p><strong>Email:</strong> <span id="contact-email">test</span></p>
          <p><strong>WhatsApp:</strong> <span id="contact-whatsapp">test</span></p>
        </div>
      </div>
    </section>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Custom JS -->
  <script>
    function viewCV(filePath) {
      window.open(filePath, '_blank');
    }

    function downloadCV(filePath) {
      const link = document.createElement('a');
      link.href = filePath;
      link.download = filePath.split('/').pop();
      document.body.appendChild(link);
      link.click();
      document.body.removeChild(link);
    }

    function viewIDCard(filePath) {
      window.open(filePath, '_blank');
    }

    function downloadIDCard(filePath) {
      const link = document.createElement('a');
      link.href = filePath;
      link.download = filePath.split('/').pop();
      document.body.appendChild(link);
      link.click();
      document.body.removeChild(link);
    }
  </script>
</body>
</html>
