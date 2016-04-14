
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"
        integrity="sha256-Sk3nkD6mLTMOF0EOpNtsIry+s1CsaqQC1rVLTAy+0yc= sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ=="
        crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
        $(".delete-button").click(function () {
            var trParent = $(this).parent();
            console.log("Clicked!");
            var submitButton = trParent.find('.delete-submit',0);
            var result;
            var r = confirm("Do you want do Delete!");
            if (r == true) {
                submitButton.click();

            }

        });
    });
</script>
@yield('footer')

</body>
</html>