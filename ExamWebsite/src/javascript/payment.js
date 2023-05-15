const cardOption = document.getElementById("card")
		const cardAddon = document.getElementById("card_option")
		const cardInput = document.getElementById("cardNumber")

		const billName = document.getElementById("name")
		const billContact = document.getElementById("contact")
		const billEmail = document.getElementById("email")

		const cardMonth = document.getElementById("expMonth")
		const cardYear = document.getElementById("expYear")
		const cardCVC = document.getElementById("cvc")
		

		function check() {
			if (cardOption.checked) {
				cardAddon.classList.add("show")
				cardInput.setAttribute("required", "")
				cardMonth.setAttribute("required", "")
				cardYear.setAttribute("required", "")
				cardCVC.setAttribute("required", "")

				billName.setAttribute("required", "")
				billContact.setAttribute("required", "")
				billEmail.setAttribute("required", "")

			} else {
				cardAddon.classList.remove("show")
				cardInput.removeAttribute("required")
				cardMonth.removeAttribute("required")
				cardYear.removeAttribute("required")
				cardCVC.removeAttribute("required")

				billName.removeAttribute("required")
				billContact.removeAttribute("required")
				billEmail.removeAttribute("required")
			}
		}