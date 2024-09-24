<?php
/**
 * Plugin Name: Typing Challenge
 * Description: A typing game where users can test their speed and view their scores.
 * Version: 1.0
 * Author: Your Name
 */

// Enqueue game styles and scripts
function tc_enqueue_assets() {
    wp_enqueue_style('tc-style', plugins_url('css/style.css', __FILE__));
    wp_enqueue_script('tc-game', plugins_url('js/game.js', __FILE__), array('jquery'), null, true);

    // Pass Ajax URL to JavaScript
    wp_localize_script('tc-game', 'tc_ajax', array('ajax_url' => admin_url('admin-ajax.php')));
}
add_action('wp_enqueue_scripts', 'tc_enqueue_assets');

// Create game page shortcode
function tc_game_shortcode() {
    ob_start();
    ?>
    <div class="container">
      <h2>Typing Challenge</h2>
      <p id="paragraph">The quick brown fox jumps over the lazy dog again and again without stopping to rest.</p>
      <textarea id="userInput" placeholder="Start typing here..."></textarea>
    </div>
    <div id="popup" class="popup">
      <div class="popup-header" id="popupHeader"></div>
      <p class="popup-result" id="popupResult"></p>
      <p class="time-taken" id="timeTaken"></p>
      <div class="popup-footer">
        <button class="close-btn" onclick="closePopup()">Close</button>
        <button class="retry-btn" onclick="retry()">Retry</button>
      </div>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('typing_challenge', 'tc_game_shortcode');
include_once(plugin_dir_path(__FILE__) . 'scoreboard.php');


// Create a custom database table for scores
function tc_create_score_table() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'tc_scores';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
      id mediumint(9) NOT NULL AUTO_INCREMENT,
      user_id mediumint(9) NOT NULL,
      score_time float NOT NULL,
      win_loss varchar(10) NOT NULL,
      created_at datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,
      PRIMARY KEY  (id)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}
register_activation_hook(__FILE__, 'tc_create_score_table');

// Save score via AJAX
function tc_save_score() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'tc_scores';

    $user_id = get_current_user_id();
    $time_taken = floatval($_POST['time']);
    $result = $_POST['result']; // "win" or "lose"

    $wpdb->insert(
        $table_name,
        array(
            'user_id' => $user_id,
            'score_time' => $time_taken,
            'win_loss' => $result
        )
    );
    wp_send_json_success('Score saved.');
}
add_action('wp_ajax_tc_save_score', 'tc_save_score');

// Display user's score history
function tc_display_scores() {
    if (is_user_logged_in()) {
        global $wpdb;
        $user_id = get_current_user_id();
        $table_name = $wpdb->prefix . 'tc_scores';

        $scores = $wpdb->get_results("SELECT * FROM $table_name WHERE user_id = $user_id ORDER BY created_at DESC");

        if (!empty($scores)) {
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
add_shortcode('typing_challenge_scores', 'tc_display_scores');
