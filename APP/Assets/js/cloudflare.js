// This is the demo secret key. In production, we recommend
// you store your secret key(s) safely.
const SECRET_KEY = '0x4AAAAAAAC9NryAiuZAiFsKoZ20KNBOJHo';

async function handlePost(request) {
	const body = await request.formData();

	const token = body.get('cf-turnstile-response');
	const ip = request.headers.get('CF-Connecting-IP');

	// Validate the token by calling the
	// "/siteverify" API endpoint.
	let formData = new FormData();
	formData.append('secret', SECRET_KEY);
	formData.append('response', token);
	formData.append('remoteip', ip);

	const url = 'https://challenges.cloudflare.com/turnstile/v0/siteverify';
	const result = await fetch(url, {
		body: formData,
		method: 'POST',
	});

	const outcome = await result.json();
	if (outcome.success) {
		
	}
}