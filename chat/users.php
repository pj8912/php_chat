<?php session_start(); ?>

<?php

echo "<h1 align='center'> Welcome {$_SESSION['u_uname']} </h1> <a href='../users/logout.php'>logout</a>";


include '../db.php';


$sql = "SELECT  * FROM users WHERE user_id != {$_SESSION['u_id']} ";

$result = mysqli_query($conn, $sql);

$num = mysqli_num_rows($result);

if ($num > 0) {

    echo '
            <div align="center" style="margin-top:100px">
            <ul>';

    while ($row = mysqli_fetch_assoc($result)) {

        echo '<li><a href="chat.php?oid=' . $row['user_id'] . '&oname='.$row['user_uname'].'">' . $row['user_uname'] . '</a>
        <span onclick= "sendRequest()" style="background:dodgerblue;color:white;padding:5px;font-weight:bold;font-size:14px;margin-left:3px;border-radius:20px"> Connect </span> 
        </li>';
    }

    echo '</ul>
            </div>';
} else {
    echo "No users available to chat";
}
?>


<script>
const id  = <?php echo $_SESSION['other_id'];?>;
console.log(id)

    // async function sendRequest(){

    //     await fetch('request/request_connection.php',{
    //         method: 'POST',
    //         body: JSON.stringify({
    //             receiver_id : id
    //         })
    //     })
    // }

    // async function fetchUsers(){
    //     const response = await fetch(fetchUsers.php);
    //     await response.json().then(users =>{
    //         let op = '';
    //         for(let i in users){
    //             if(users[i] == null){

    //             }
    //             else{
    //                 op += `

    //                 `;
    //             }
    //         }
    //     })
    // }
</script>