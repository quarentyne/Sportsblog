window.addEventListener("load", () => {
    const form = document.querySelector('#comment-form');
    const commentsBlock = document.querySelector('#comments');
    const textarea = form.querySelector('textarea');

    form?.addEventListener('submit', async (e) => {
        e.preventDefault();

        const endpoint = form.getAttribute('action');

        if(!textarea.value.trim()) {
            textarea.classList.add('border-red-900');
            textarea.classList.remove('border-stone-300');

            return;
        }

        try{
            const response = await fetch(endpoint, {
                    method: 'POST',
                    body: new FormData(form),
                },
            );

            const comment = await response.json();

            const html = document.createElement('div');
            html.classList.add('py-10', 'flex', 'gap-5', 'border-t', 'border-stone-300');

            const img = document.createElement('img');
            img.alt = 'Avatar';
            img.src = `${window.location.origin}/images/${comment.user.avatar}`;
            img.classList.add('w-[48px]', 'h-[48px]', 'rounded-[50%]');
            html.append(img);

            const div = document.createElement('div');

            const authorName = document.createElement('span');
            authorName.classList.add('block', 'font-semibold', 'text-lg', 'mb-3')
            authorName.innerText = `${comment.user.first_name} ${comment.user.last_name}`;
            div.append(authorName);

            const commentBody = document.createElement('p');
            commentBody.classList.add('text-stone-800', 'mb-3');
            commentBody.innerText = comment.body;
            div.append(commentBody);

            const dateLine = document.createElement('p');
            dateLine.classList.add('flex', 'gap-4', 'text-stone-800');

            const date = new Date(comment.created_at);

            const dateFull = document.createElement('span');
            dateFull.innerText = date.toLocaleDateString('en-GB', {
                day: '2-digit',
                month: 'long',
                year: 'numeric'
            });
            dateLine.append(dateFull);

            const time = document.createElement('span');
            time.innerText = date.toLocaleTimeString('en-US', {
                hour: 'numeric',
                minute: '2-digit',
                hour12: true
            });
            dateLine.append(time);
            div.append(dateLine);
            html.append(div);

            commentsBlock.prepend(html);

            textarea.value = '';
        } catch (e) {
            alert(e.message);
        }
    });
});
