<div class="container">
	<h1>
	    Add User
	</h1>
	{{ flash.output() }}
	<form action="{{ url('user/add') }}" method="post">

	    <p>
	        <label>First Name:</label><br>
	        <input type="text" name="first_name">
	    </p>
	    <p>
	        <label>Last Name:</label><br>
	        <input type="text" name="last_name">

	    </p>
	    <p>
	        <label>Email:</label><br>
	        <input type="text" name="email">

	    </p>
	    <p>
	        <label>Gender:</label><br>
	        <input type="radio" name="gender" value="Male" checked> Male
	  		<input type="radio" name="gender" value="Female"> Female
	    </p>
	    <p>
	    	<label>Education:</label><br>
	    	<select name="education">
				<option value="BE">BE</option>
				<option value="BSC">BSC</option>
				<option value="MCA">MCA</option>
				<option value="M.Tech">M.Tech</option>
			</select>
	    </p>
	    <p>
	        <label>Skills:</label><br>
	        <textarea name="skills"></textarea>

	    </p>
	 	<p>
	        <input type="submit" value="SUBMIT"/>
	    </p>

	</form>
</div>