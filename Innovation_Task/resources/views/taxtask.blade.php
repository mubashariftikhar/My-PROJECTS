<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sum and Tax Calculation</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <form id="calculationForm">
        <label for="value1">Value 1:</label>
        <input type="text" id="value1" name="value1"><br><br>

        <label for="value2">Value 2:</label>
        <input type="text" id="value2" name="value2"><br><br>

        <label for="value3">Value 3:</label>
        <input type="text" id="value3" name="value3"><br><br>

        <button type="submit">Submit</button><br><br>

        <label for="sum">Sum:</label>
        <input type="text" id="sum" name="sum" readonly><br><br>

        <label for="tax">Tax (17%):</label>
        <input type="text" id="tax" name="tax" readonly><br><br>
    </form>

    <script>
        $(document).ready(function() {
            $('#calculationForm').on('submit', function(event) {
                event.preventDefault();
                
                var value1 = parseFloat($('#value1').val()) || 0;
                var value2 = parseFloat($('#value2').val()) || 0;
                var value3 = parseFloat($('#value3').val()) || 0;
                
                var sum = value1 + value2 + value3;
                var tax = (sum * 0.17).toFixed(2);
                
                $('#sum').val(sum);
                $('#tax').val(tax);
            });
        });
    </script>
</body>
</html>
