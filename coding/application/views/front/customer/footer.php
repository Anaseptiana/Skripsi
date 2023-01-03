	<br><br>
	<script>
	    function printDiv(divName) {
	        var printContents = document.getElementById(divName).innerHTML;
	        var originalContents = document.body.innerHTML;

	        document.body.innerHTML = printContents;
	        var css = '@page { size: potrait; }',
	            head = document.head || document.getElementsByTagName('head')[0],
	            style = document.createElement('style');

	        style.type = 'text/css';
	        style.media = 'print';

	        if (style.styleSheet) {
	            style.styleSheet.cssText = css;
	        } else {
	            style.appendChild(document.createTextNode(css));
	        }

	        head.appendChild(style);
	        window.print();

	        document.body.innerHTML = originalContents;
	    }
	</script>
</body>

</html>