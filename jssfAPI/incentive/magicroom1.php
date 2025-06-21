<?php

require '../header_file.php';
require '../../vendor/autoload.php';
require '../login/verifyToken.php';

class Node
{
    public $data;
    public $left;
    public $middle;
    public $right;

    public function __construct($data)
    {
        $this->data = $data;
        $this->left = null;
        $this->middle = null;
        $this->right = null;
    }
}
function buildTreeFromDatabase($userId)
{
    require '../connection/dbconnection.php';

    $query = "SELECT * from magic_tree where userid = '$userId' ";
    $result = $conn->query($query);


    if ($result->rowCount() > 0) {
        $row = $result->fetch();
        $node = new Node($row['userid']);
        $node->left = buildTreeFromDatabase($row['left_child']);
        $node->middle = buildTreeFromDatabase($row['center_child']);
        $node->right = buildTreeFromDatabase($row['right_child']);
        return $node;
    } else {
        return null;
    }
}

function treeToArray($node)
{
    if ($node != null) {
        $data = [
            'data' => $node->data,
            'left' => treeToArray($node->left),
            'middle' => treeToArray($node->middle),
            'right' => treeToArray($node->right)
        ];
        return $data;
    } else {
        return null;
    }
}

function deepNodeCountByLevel($node, $level = 0, &$counts = [])
{
    if (!isset($counts[$level])) {
        $counts[$level] = 0;
    }

    if ($node != null) {
        $counts[$level]++;
        deepNodeCountByLevel($node->left, $level + 1, $counts);
        deepNodeCountByLevel($node->middle, $level + 1, $counts);
        deepNodeCountByLevel($node->right, $level + 1, $counts);
    }
}


require '../connection/dbconnection.php';

if (isset($_REQUEST['decoded_token'])) {
    $decodedToken = $_REQUEST['decoded_token'];
    $yourArray = json_decode(json_encode($decodedToken), true);
    $userid = $yourArray['user_id'];  // Get user id from the decoded token

    // $userid = $_SESSION['username']; // Example userId
    $root = buildTreeFromDatabase($userid);
    // Convert tree to array
}


// $treeArray = treeToArray($root);

$counts = [];
deepNodeCountByLevel($root, 0, $counts);

$numbers = [0, 110, 150, 200, 400, 600, 800, 1000, 1200, 1400, 1600, 1800, 2000, 2200];

// Accessing numbers by index
$totalRoomEncome = 0;
$magicPool1Script = ' <tr class="bg-dark text-center">
 <th class="text-white">Room</th>
 <th class="text-white">Number Of Person</th>
 <th class="text-white">Income</th>
</tr>';
foreach ($counts as $level => $count) {

    if ($level != 0) {
        if (3 ** $level == $count) {

            if (isset($numbers[$level])) {
                $numberAtIndex = $numbers[$level];
                $totalRoomEncome = $totalRoomEncome + $numberAtIndex;
                $magicPool1Script .= "<tr class='text-center'>
                <td><label>Room $level</label></td>
                <td><label>3</label></td>
                <td><label>$numberAtIndex</label></td>
            </tr>";
            }
        } else if ($count != 0) {
            if ($root != 'JSSF0001') {
                $magicPool1Script .= "<tr class='text-center'>
                <td><label>Room $level</label></td>
                <td><label>0</label></td>
                <td><label>0</label></td>
            </tr>";
            }
        }
    }
}

echo json_encode(["status" => 200, "magicpool" => $magicPool1Script, "message" => $totalRoomEncome]);




// $treeArrayForUI = treeToArrayForUI($root);


// $treeJson = json_encode($treeArray, JSON_PRETTY_PRINT);

// Output JSON
// echo $treeJson;



// Function to render the tree nodes recursively
// function renderNodes($node)
// {
//     if ($node != null) {
//         echo '<div class="node">' . $node['userId'] . '</div>';
//         if (!empty($node['children'])) {
//             foreach ($node['children'] as $child) {
//                 renderNodes($child);
//             }
//         }
//     }
// }

// Render the tree nodes
// renderNodes($treeArrayForUI);
