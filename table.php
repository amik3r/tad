<?php  // $Id$
/**
 * Simple file test.php to drop into root of Moodle installation.
 * This is the skeleton code to print a downloadable, paged, sorted table of
 * data from a sql query.
 */
require_once(__DIR__ . '/../../config.php');
require_once("$CFG->libdir/tablelib.php");
$context = context_system::instance();
$PAGE->set_context($context);
$PAGE->set_url('/table.php');

$download = optional_param('download', '', PARAM_ALPHA);

$table = new table_sql('uniqueid');
$table->is_downloading($download, 'test', 'testing123');

if (!$table->is_downloading()) {
    // Only print headers if not asked to download data
    // Print the page header
    $PAGE->set_title('Testing');
    $PAGE->set_heading('Testing table class');
    $PAGE->navbar->add('Testing table class', new moodle_url('/test.php'));
    echo $OUTPUT->header();
}



// Work out the sql for the table.
$table->set_sql('*', "{files}","filename LIKE '%TAD%' and component = 'local_tad' AND filearea = 'attachment'");

$table->define_baseurl("$CFG->wwwroot/test.php");

$table->out(40, true);

if (!$table->is_downloading()) {
    echo $OUTPUT->footer();
}