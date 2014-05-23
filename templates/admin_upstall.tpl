{strip}

<div class="admin upstall">
	{if $error}
		<h2>Error</h2>
		<div class="preview">
			{$error}
		</div>
	{/if}

	
		<h1>
			Select Package File to UpStall
		</h1>

		{form enctype="multipart/form-data" id="upload_upstallform"}
			{jstabs}
				{jstab}
					{legend legend="Upload File For UpStall"}
						<div class="control-group">
							You can download packages from <a href="http://www.bitweaver.org/builds/packages/HEAD/">http://www.bitweaver.org/builds/packages/HEAD/</a>.<br/>
							Please note:
							<ul>
								<li>
									.zip files only
								</li>
								<li>
									The files mus follow the <code>bitweaver_bit_<i>package_name</i>_package.zip</code> naming convention or they will be rejected by UpStall
								</li>
							</ul>
						</div>
						<div class="control-group">
							{formlabel label="File:" for="upstall_file"}
							{forminput}
								<input type="file" size="60" name="upstall_file" id="upstall_file" />
							{/forminput}
							{forminput}
								<input type="hidden" name="action" value="install" />
							{/forminput}
							{forminput}
								<input type="hidden" name="source" value="upload"/>
							{/forminput}
							{forminput}
								<input type="hidden" name="page" value="upstall"/>
							{/forminput}
						</div>
						
						<div class="control-group submit">
							<input type="submit" class="btn btn-default" name="upload_upstall" value="{tr}Upload{/tr}" />
						</div>
					{/legend}
				{/jstab}
			{/jstabs}
		{/form}
</div><!-- end .upstall -->

{/strip}