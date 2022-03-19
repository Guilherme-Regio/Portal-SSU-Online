        </div>
    </div>
</body>
<!-- Js bootstrap-->
    
    <script src="/bibliotecas/bootstrap-4/js/bootstrap.js"></script>
    <script src="/bibliotecas/datatables/datatables.min.js"></script>
    <script src="/bibliotecas/datatables/datatables/js/dataTables.bootstrap.min.js"></script>



<script>
  $(function () {
    $('.dropdown-toggle').dropdown();
  });
</script>

<script>
function stateCheck($formControl){
	if($formControl.val().lenght >0)
{
	$formControl.addClass('valid');
}
else{
	$formControl.removeClass('valid');
  }
}
</script>
</html>
