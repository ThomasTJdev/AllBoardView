<?= $this->asset->css('plugins/AllBoardView/assets/css/theme.blue.css') ?>
<?= $this->asset->css('plugins/AllBoardView/assets/css/theme.bootstrap.css') ?>

<!-- js files -->
<script src="http://cdn.webix.com/site/webix.js" type="text/javascript"></script>
<script src="http://cdn.webix.com/site/kanban/kanban.js" type="text/javascript"></script>
<!-- css files -->
<link rel="stylesheet" href="http://cdn.webix.com/site/webix.css" type="text/css" charset="utf-8">
<link rel="stylesheet" href="http://cdn.webix.com/site/kanban/kanban.css" type="text/css" charset="utf-8">

<style>
.projectnameh2 {
    padding-left: 10px;
}
</style>


<?php
// If this is the project specific table render project-header
if ($project != 'Allprojects') {
?>
<?= $this->projectHeader->render($project, 'ProjectOverviewController', 'show') ?>
<?php
}
?>

<?php
$task = array();
$haystack = "Backlog Ready Work in progress Done"; // Either change according to your columns or delete if statement below. If you decide to delete, remember to add all your columns to the JS in the cols:[].
$dummy = "0";
$pn = "";
$dd = "";
foreach($AllBoardViewData as $task){
    if (strpos($haystack, $task['column_name']) !== false) {
        if ($dummy == "0") {
          $pn = $task['project_name'];
          $dummy = "1";
        }

        $dd .= '{id: "' . $task['id'] . '", text: "' . $task['title'] . '", status: "' . $task['column_name'] . '", color: "' . $task['color_id'] . '"},'; //, project: "' . $task['project_name'] . '"
        //$pn = $task['project_name'];
        if ($pn !== $task['project_name']) {

            ?>

            <br><br>
            <h2><a class="projectnameh2" href="/kanboard/?controller=BoardViewController&action=show&project_id=<?php print $task['project_id']; ?>"><?php print $pn; ?></a></h2>

            <?php

            $dd = 'data: [' . $dd . ']';
            print '
            <div id="' . $task['project_name'] . '" style="overflow:auto; overflow-x: hidden; width: auto;"></div>
            <script>
            webix.ready(function(){
                //object constructor
                webix.ui({
                    view:"kanban",
                    container:"' . $task['project_name'] . '",
                    height:500,
                    type:"cards",

                    //the structure of columns on the board. Add your columns here.
                    cols:[
                        { header:"Backlog",
                            body:{ view:"kanbanlist", status:"Backlog", height:300 }},
                        { header:"Ready",
                            body:{ view:"kanbanlist", status:"Ready" }},
                        { header:"Work in progress",
                            body:{ view:"kanbanlist", status:"Work in progress" }},
                        { header:"Done",
                            body:{ view:"kanbanlist", status:"Done" }}

                    ],' . $dd . '});
            });
            </script>

            ';
            $dd = "";

            $pn = $task['project_name'];
        }

    }
}
?>

<br>
<br>
