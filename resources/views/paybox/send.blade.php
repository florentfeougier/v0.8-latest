<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Send Paybox payment</title>
</head>
<body>
<form method="post" action="{{ $url }}" id="paybox-payment">
    @foreach ($parameters as $name => $value)
        <input type="hidden" name="{{ $name }}" value="{{ $value }}">
    @endforeach

    <input type="submit" value="Redirection vers le site du Crédit Agricole en cours. Cliquer ici sur vous n'êtes pas rediriger automatiquement...">
</form>
<script>
    document.getElementById("paybox-payment").submit();
</script>
</body>
</html>
