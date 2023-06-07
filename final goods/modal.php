<?php
// Modal for Delete Confirmation
foreach ($db->query($sql) as $row) {
    echo '<div class="modal fade" id="delete_' . $row['id'] . '" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Delete Reminder</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <p class="text-center">Are you sure you want to delete this reminder?</p>
                <h2 class="text-center">' . $row['title'] . '</h2>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <a href="delete_reminder.php?reminder_id=' . $row['id'] . '" class="btn btn-danger">Yes, Delete</a>
              </div>
            </div>
          </div>
        </div>';
}
?>
