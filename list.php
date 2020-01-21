<html>
<script>
var $select_auction_data =
 <?php 
 $list = R::findAll('auction');
 $numItem = R::count( 'auction' );
 $step = 1;
 echo "'{";
	foreach( $list as $row) {
			echo '"'.$row['id'].'":';
			if( $step != $numItem) {
				echo '"'.$row['title'].'",';
			} else
			{
				echo '"'.$row['title'].'"';
			}
			$step = $step + 1;
	}
echo "}'";
?>;

var $select_item_data =
 <?php 
 $list = R::findAll('item');
 $numItem = R::count( 'item' );
 $step = 1;
 echo "'{";
	foreach( $list as $row) {
			echo '"'.$row['id'].'":';
			if( $step != $numItem) {
				echo '"'.$row['title'].'",';
			} else
			{
				echo '"'.$row['title'].'"';
			}
			$step = $step + 1;
	}
echo "}'";
?>;

var $select_peoples_data =
 <?php 
 $list = R::findAll('peoples');
 $numItem = R::count( 'peoples' );
 $step = 1;
 echo "'{";
	foreach( $list as $row) {
			echo '"'.$row['id'].'":';
			if( $step != $numItem) {
				echo '"'.$row['name'].' '.$row['surname'].'",';
			} else
			{
				echo '"'.$row['name'].' '.$row['surname'].'"';
			}
			$step = $step + 1;
	}
echo "}'";
?>;

var $select_status_data =
 <?php 
 $list = R::findAll('status');
 $numItem = R::count( 'status' );
 $step = 1;
 echo "'{";
	foreach( $list as $row) {
			echo '"'.$row['id'].'":';
			if( $step != $numItem) {
				echo '"'.$row['title'].'",';
			} else
			{
				echo '"'.$row['title'].'"';
			}
			$step = $step + 1;
	}
echo "}'";
?>;

var $select_spec_data =
 <?php 
 $list = R::findAll('specification');
 $numItem = R::count( 'specification' );
 $step = 1;
 echo "'{";
	foreach( $list as $row) {
			echo '"'.$row['id'].'":';
			if( $step != $numItem) {
				echo '"'.$row['title'].'",';
			} else
			{
				echo '"'.$row['title'].'"';
			}
			$step = $step + 1;
	}
echo "}'";
?>;
console.log($select_item_data);
</script>
</html>