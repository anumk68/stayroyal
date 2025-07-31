<form id="redirectForm" method="post" action="{{ $ccavenue_url }}">
    <input type="hidden" name="encRequest" value="{{ $encRequest }}">
    <input type="hidden" name="access_code" value="{{ $access_code }}">
</form>

<script type="text/javascript">
    document.getElementById('redirectForm').submit();
</script>
