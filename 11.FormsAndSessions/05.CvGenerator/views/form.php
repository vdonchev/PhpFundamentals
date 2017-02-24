<div style="width: 40%; margin: auto">
    <form action="">
        <fieldset>
            <legend>Personal Information</legend>
            <div>
                <input type="text" name="firstName" title="First Name" placeholder="First Name" required value="Videlin">
            </div>
            <div><input type="text" name="lastName" title="Last Name" placeholder="Last Name" required value="Donchev"></div>
            <div><input type="email" name="email" title="Email" placeholder="Email" required value="xmt@abv.bg"></div>
            <div><input type="text" name="phoneNumber" title="Phone Number" placeholder="Phone Number" required value="+359 895 44 33 22"></div>

            <div>
                <label for="female">Female </label>
                <input type="radio" name="sex" id="female" value="female">
                <label for="male">Male </label>
                <input type="radio" name="sex" id="male" value="male" checked>
            </div>

            <div>
                <div><label for="birthDate">Birth Date</label></div>
                <input type="text" id="birthDate" name="birthDate" placeholder="dd/mm/yyyy" required value="15/01/1985">
            </div>
            <div>
                <div><label for="nationality">Nationality</label></div>
                <select name="nationality" id="nationality" required>
                    <option value="Bulgarian">Bulgarian</option>
                </select>
            </div>
        </fieldset>

        <fieldset>
            <legend>Last Work Position</legend>
            <div>
                <label for="companyName">Company Name</label>
                <input type="text" name="companyName" id="companyName" required value="Self Employed">
            </div>
            <div>
                <label for="companyFrom">From </label>
                <input type="text" id="companyFrom" name="companyFrom" placeholder="dd/mm/yyyy" required value="01/01/2009">
            </div>
            <div>
                <label for="companyTo">To </label>
                <input type="text" id="companyTo" name="companyTo" placeholder="dd/mm/yyyy" required value="24/02/2017">
            </div>
        </fieldset>

        <fieldset>
            <legend>Computer Skills</legend>
            <div><label for="language">Programming Language</label></div>
            <div>
                <input type="text" name="language[]" id="language" required value="PHP">
                <select name="languageLevel[]" id="languageLevel" required>
                    <option value="Beginner">Beginner</option>
                </select>
            </div>
            <div>
                <input type="text" name="language[]" id="language">
                <select name="languageLevel[]" id="languageLevel">
                    <option value="Beginner">Beginner</option>
                </select>
            </div>
            <div>
                <input type="text" name="language[]" id="language">
                <select name="languageLevel[]" id="languageLevel">
                    <option value="Beginner">Beginner</option>
                </select>
            </div>
        </fieldset>

        <fieldset>
            <legend>Other Skills</legend>
            <div>
                <div><label for="otherLang">Languages</label></div>
                <input type="text" name="otherLang[]" id="otherLang" required value="English">
                <select name="comprehension[]">
                    <option value="beginner" selected>Beginner</option>
                    <option value="intermediate">Intermediate</option>
                    <option value="advanced">Advanced</option>
                </select>
                <select name="reading[]">
                    <option value="beginner" selected>Beginner</option>
                    <option value="intermediate">Intermediate</option>
                    <option value="advanced">Advanced</option>
                </select>
                <select name="writing[]">
                    <option value="beginner" selected>Beginner</option>
                    <option value="intermediate">Intermediate</option>
                    <option value="advanced">Advanced</option>
                </select>
            </div>
            <div>
                <div><label for="otherLang">Languages</label></div>
                <input type="text" name="otherLang[]" id="otherLang">
                <select name="comprehension[]">
                    <option value="beginner" selected>Beginner</option>
                    <option value="intermediate">Intermediate</option>
                    <option value="advanced">Advanced</option>
                </select>
                <select name="reading[]">
                    <option value="beginner" selected>Beginner</option>
                    <option value="intermediate">Intermediate</option>
                    <option value="advanced">Advanced</option>
                </select>
                <select name="writing[]">
                    <option value="beginner" selected>Beginner</option>
                    <option value="intermediate">Intermediate</option>
                    <option value="advanced">Advanced</option>
                </select>
            </div>
            <div>
                <div><label for="otherLang">Languages</label></div>
                <input type="text" name="otherLang[]" id="otherLang">
                <select name="comprehension[]">
                    <option value="beginner" selected>Beginner</option>
                    <option value="intermediate">Intermediate</option>
                    <option value="advanced">Advanced</option>
                </select>
                <select name="reading[]">
                    <option value="beginner" selected>Beginner</option>
                    <option value="intermediate">Intermediate</option>
                    <option value="advanced">Advanced</option>
                </select>
                <select name="writing[]">
                    <option value="beginner" selected>Beginner</option>
                    <option value="intermediate">Intermediate</option>
                    <option value="advanced">Advanced</option>
                </select>
            </div>
            <div>
                <div><label for="driversLicense">Driver's License</label></div>
                B <input type="checkbox" name="drivingLicense[]" value="B" checked>
                A <input type="checkbox" name="drivingLicense[]" value="A" checked>
                C <input type="checkbox" name="drivingLicense[]" value="C" >
            </div>
        </fieldset>

        <input type="submit" value="Generate CV" name="submit">
    </form>
</div>