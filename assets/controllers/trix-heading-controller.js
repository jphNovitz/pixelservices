import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
    connect() {
        document.addEventListener("trix-initialize", this.addHeadingButtons);
    }

    addHeadingButtons(event) {
        const toolbar = event.target.toolbarElement;
        const group = toolbar.querySelector(".trix-button-group--block-tools");

        const headings = [
            { attr: 'heading2', label: 'H2', title: 'Titre H2' },
            { attr: 'heading3', label: 'H3', title: 'Titre H3' },
            { attr: 'heading4', label: 'H4', title: 'Titre H4' },
        ];

        headings.forEach(({ attr, label, title }) => {
            const button = document.createElement("button");
            button.setAttribute("type", "button");
            button.className = "trix-button";
            button.setAttribute("data-trix-attribute", attr);
            button.setAttribute("title", title);
            button.textContent = label;

            group.appendChild(button);
        });
    }
}
