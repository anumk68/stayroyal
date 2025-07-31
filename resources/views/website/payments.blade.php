<!DOCTYPE html>
<html>
<head>
    <title>Redirecting to Payment Gateway...</title>
</head>
<body onload="document.forms['redirect'].submit();">
    <form method="post" name="redirect" action="https://secure.ccavenue.com/transaction/transaction.do?command=initiateTransaction">
        <input type="hidden" name="encRequest" value="{{ $encRequest }}"/>
        <input type="hidden" name="access_code" value="{{ $access_code }}"/>
    </form>
</body>
</html>
