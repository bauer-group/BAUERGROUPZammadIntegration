{extends file="parent:frontend/index/index.tpl"}

	{* Javascript *}
	{block name="frontend_index_javascript_async_ready"}
	  {$smarty.block.parent}

	  <!-- BAUER GROUP - Zammad Chatwidget for Support | START -->
	  <script type="text/javascript">
		document.asyncReady(function() {ldelim}
			$(function() {ldelim}	
				new ZammadChat({ldelim}
				  title: '{$BAUERGROUPZammadIntegration_TitleText}',
				  background: '{$BAUERGROUPZammadIntegration_BackgroundColor}',
				  fontSize: '{$BAUERGROUPZammadIntegration_FontSize}px',
				  {if $BAUERGROUPZammadIntegration_FlatDesign}flat: true,
				  {/if}
				  host: "wss://{$BAUERGROUPZammadIntegration_Hostname}/ws",
				  chatId: {$BAUERGROUPZammadIntegration_ChatID},
				  cssAutoload: false
				{rdelim});
			{rdelim});
		{rdelim});	
	  </script>
	  <!-- BAUER GROUP - Zammad Chatwidget for Support | END -->
	{/block}
