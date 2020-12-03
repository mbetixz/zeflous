{block name=body}
{translate import=register set=true}
<section layout-name=register>
	<form name=register method=post>
		<ul>
			<li>
				{HTMLinput
					label=lng('Name')
					name=name
					type=text
					minlength=3
					maxlength=15
					desc=lng("Min:3 &amp; Max:15 Characters")
					required=required
				}
			</li>
			<li>
				{HTMLinput
					label=lng('Fullname')
					name=fullname
					type=text
					minlength=3
					maxlength=30
					desc=lng("Min:3 &amp; Max:30 Characters")
					required=required
				}
			</li>
			<li>
				{HTMLinput
					label=lng('Email Address')
					name=email
					type=text
					minlength=6
					maxlength=30
					desc=lng("Please enter valid email address")
					required=required
				}
			</li>
			<li>
				{HTMLinput
					label=lng('Password')
					name=password
					type=password
					minlength=8
					maxlength=30
					desc=lng("Please enter strongest password")
					required=required
				}
			</li>
			<li>
				{HTMLinput
					label=lng('Retype Password')
					name=repassword
					type=password
					minlength=8
					maxlength=30
					desc=lng("Please confirm password")
					required=required
				}
			</li>
			<li>
				{HTMLselect
					label=lng('Gender')
					name=gender
					data=['' => lng('Please select'), 'm' => lng('Male'), 'w' => lng('Female')]
					desc=lng("Please enter strongest password")
					required=required
				}
			</li>
			<li>
				{HTMLcheckbox
					label=lng('Term &amp; Services')
					name=term
					desc=lng("By clicking submit button, you agree with term &amp; service this site.")
					required=required
				}
			</li>
			<li>

			</li>
		</ul>
	</form>
</section>
{/block}