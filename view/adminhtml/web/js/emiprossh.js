function emissh(t,e){require(["jquery"],function(n){if(t){var o=document.getElementById("iframeID");o.src=e?window.emi_URL+"type/"+t+"/custom/"+btoa(e):window.emi_URL+"type/"+t,o.reload(!0)}})}function customcommand(t){require(["jquery"],function(e){t&&"customcommand"==t?e("#custom_ssh_command").show():e("#custom_ssh_command").hide()})}function scrollbottom(t){document.getElementById(t).contentWindow.scrollTo(0,document.getElementById(t).contentWindow.document.body.scrollHeight)}function emisshgit(t){require(["jquery"],function(e){if(t){var n=document.getElementById("iframeIDGit");n.src=window.emi_URL_git+"type/"+t,n.reload(!0)}})}require(["jquery","Magento_Ui/js/modal/confirm","Magento_Ui/js/modal/alert"],function(t,e,n){t("#confirm_init_mag_ssh").click(function(){if(t("#emi_ssh_select_mag").val()){var o="";if("customcommand"==t("#emi_ssh_select_mag").val()&&""==(o=t("#custom_ssh_command").val()))return void n({title:"Something went wrong",content:"Please enter command.",actions:{always:function(){}}});e({title:"Confirmation",content:"Are you sure you want to perform this action?",actions:{confirm:function(){emissh(t("#emi_ssh_select_mag").val(),o)}}})}}),t("#custom_ssh_command").keyup(function(e){13==e.keyCode&&(e.preventDefault(),t("#confirm_init_mag_ssh").click())})}),require(["jquery","Magento_Ui/js/modal/confirm"],function(t,e){t("#confirm_init_git_ssh").click(function(){t("#emi_ssh_select_git").val()&&e({title:"Confirmation",content:"Are you sure you want to perform this action?",actions:{confirm:function(){emisshgit(t("#emi_ssh_select_git").val())}}})})});