var $tree = $tree || $('#categories-tree');
var $question_categories = $question_categories || $('#question-categories');

/**
 * Initiate the tree and open all items
 * When a node is changed, loop through all of its dependencies
 * and search through the tree to check/uncheck them
 */
$tree.jstree({
    "checkbox" : {
        "keep_selected_style" : true,
        "three_state": false
    },
    "plugins" : ["checkbox", "dnd"],
}).on('ready.jstree', function() {
    $tree.jstree('open_all');
    $tree.jstree('hide_icons');
}).on('changed.jstree', function (event, object) {
    $question_categories.empty();
    $.each(object.selected, function(index, value) {
        var $input = $('<input/>', {type:'hidden', name: "question_categories[]", value: value.replace('cat-', '')});
        $question_categories.append($input);
    });
});