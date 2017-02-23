<?php if (isset($compoundInterest, $currency)): ; ?>
    <?="{$currency} {$compoundInterest}"?>
<?php endif; ?>
<hr>
<form action="">
    <div>
        <label for="amount">Enter Amount </label>
        <input type="number" step="1" min="0" name="amount" id="amount" required>
    </div>
    <div>
        <input type="radio" name="currency" id="usd" value="usd" checked>
        <label for="usd">USD</label>
        <input type="radio" name="currency" id="eur" value="eur">
        <label for="eur">EUR</label>
        <input type="radio" name="currency" id="bgn" value="bgn">
        <label for="bgn">BGN</label>
    </div>
    <div>
        <label for="interest">Compound Interest Amount </label>
        <input type="number" step="1" min="0" name="interest" id="interest" required>
    </div>
    <div>
        <select name="duration" id="duration">
            <option value="6">6 Months</option>
            <option value="12">1 Year</option>
            <option value="24">2 Years</option>
            <option value="60">5 Years</option>
        </select>

        <input type="submit" value="Calculate" name="submit">
    </div>
</form>