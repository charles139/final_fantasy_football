<h1>Inside main.php</h1>
<div>
	<ul ng-repeat='item in examples| filter:filter_name'>
		<li ng-bind='item.Name'></li>
	</ul>
</div>