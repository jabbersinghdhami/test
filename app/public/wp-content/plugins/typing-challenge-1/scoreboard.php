<?php
// scoreboard.php - Display user score history

function tc_display_scores_page() {
    if (is_user_logged_in()) {
        global $wpdb;
        $user_id = get_current_user_id();
        $table_name = $wpdb->prefix . 'tc_scores';

        $scores = $wpdb->get_results("SELECT * FROM $table_name WHERE user_id = $user_id ORDER BY created_at DESC");

        if (!empty($scores)) {
            echo '<h2>Your Typing Challenge Scores</h2>';
            echo '<table>';
            echo '<tr><th>Date</th><th>Time Taken (seconds)</th><th>Result</th></tr>';
            foreach ($scores as $score) {
                echo '<tr>';
                echo '<td>' . date('Y-m-d H:i:s', strtotime($score->created_at)) . '</td>';
                echo '<td>' . $score->score_time . '</td>';
                echo '<td>' . ucfirst($score->win_loss) . '</td>';
                echo '</tr>';
            }
            echo '</table>';
        } else {
            echo '<p>No scores recorded yet.</p>';
        }
    } else {
        echo '<p>You need to log in to view your scores.</p>';
    }
}

// Create a shortcode to display the scores on a separate page
function tc_scores_page_shortcode() {
    ob_start();
    tc_display_scores_page();
    return ob_get_clean();
}
add_shortcode('typing_challenge_scores_page', 'tc_scores_page_shortcode');
