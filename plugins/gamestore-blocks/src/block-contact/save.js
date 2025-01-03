import { useBlockProps } from '@wordpress/block-editor';

export default function save() {
	return (
		<p { ...useBlockProps.save() }>
			{ 'Gamestore Block Contact – hello from the saved content!' }
		</p>
	);
}
