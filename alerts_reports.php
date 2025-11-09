<?php include 'fetch_alerts.php'; ?>

<div class="alerts-reports">
  <h2><i class="fa fa-bell"></i> 🔔Alerts & Reports</h2>
  <div class="alert-list">
    <?php if ($result->num_rows > 0): ?>
      <?php while($row = $result->fetch_assoc()): ?>
        <div class="alert-item">
          <div class="alert-icon">🔔</div>
          <div class="alert-content">
            <a href="<?= htmlspecialchars($row['link']) ?>" target="_blank">
              <?= htmlspecialchars($row['title']) ?>
            </a>
            <div class="alert-meta">
              BY: <?= htmlspecialchars($row['author']) ?>  
              Date: <?= htmlspecialchars($row['date']) ?>
            </div>
          </div>
        </div>
      <?php endwhile; ?>
    <?php else: ?>
      <p style="padding: 10px;">No alerts available.</p>
    <?php endif; ?>
  </div>
</div>

<?php $conn->close(); ?>
