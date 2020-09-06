export const tabs = () => {
    window.addEventListener("load", function() {
        let myTabs = document.querySelectorAll("ul.c-tabs > li");

        function tabClicks(tabClickEvent) {
            for (let i = 0; i < myTabs.length; i++) {
                myTabs[i].classList.remove('active');
            }

            let clickedTab = tabClickEvent.currentTarget;

            clickedTab.classList.add('active');

            tabClickEvent.preventDefault();

            let myContentPanes = document.querySelectorAll(".c-tab-pane");
            for (let i = 0; i < myContentPanes.length; i++) {
                myContentPanes[i].classList.remove('active');
            }

            let anchorReference = tabClickEvent.target;
            let activePaneId = anchorReference.getAttribute('data-target');
            let activePane = document.querySelector(activePaneId);
            activePane.classList.add('active');
        }

        for (let i = 0; i < myTabs.length; i++) {
            myTabs[i].addEventListener('click', tabClicks);
        }
    });
};
