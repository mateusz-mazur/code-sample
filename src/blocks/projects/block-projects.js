/*
* Block Projects.
* */

    /*
    * Styles.
    * */
    import "./_projects-styles.scss";

    /*
    * Scripts.
    * */
    let moreRelatedProjectsList = document.querySelector('.more-related-projects-id-list');

    if (moreRelatedProjectsList) {
        moreRelatedProjectsList = moreRelatedProjectsList.value;
    }

    const hideMoreButton = () => {
        const moreProjectsButton = document.querySelector('.block-projects__more .c-button');

        if (moreProjectsButton) {
            moreProjectsButton.style.display = 'none';
        }
    }

    const showSpinner = () => {
        const container = document.querySelector('.block-projects__items');
        const spinner = `<div class="c-spinner"></div>`;
        container.innerHTML += spinner;
    };

    const hideSpinner = () => {
        document.querySelector('.c-spinner').style.display = 'none';
    }

    if (moreRelatedProjectsList) {
        const buttonMore = document.querySelector('.block-projects__more .c-button')

        buttonMore.addEventListener('click', (e) => {
            e.preventDefault();

            hideMoreButton();
            showSpinner();

            let curHostname = window.location.origin;
            if (curHostname.includes('localhost')) {
                curHostname = 'http://localhost:3000/sense';
            }

            fetch(`${curHostname}/wp-admin/admin-ajax.php`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: new URLSearchParams({
                    action: 'get_more_projects',
                    moreProjects: moreRelatedProjectsList,
                })
            }).then(response => {

                return response.json();

            }).then(data => {

                const moreProjects = data.data[0].more_projects;

                let container = document.querySelector('.block-projects__items');
                hideSpinner();
                container.innerHTML += moreProjects;
            });
        });
    }

    /*
    * Boxes match height.
    * */
    // $(function() {
    //     $(document).ready(function(){
    //         $('.js-').matchHeight();
    //     });
    // });
