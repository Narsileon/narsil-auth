import { Button, Section, SectionContent, SectionFooter, SectionHeader, SectionTitle } from "@narsil-ui/Components";
import { Link } from "@inertiajs/react";
import { useTranslationsStore } from "@narsil-ui/Stores/translationStore";

interface Props {
	status: string;
}

const Index = ({ status }: Props) => {
	const { trans } = useTranslationsStore();

	const title = trans("Email validation");

	return (
		<Section>
			<SectionHeader>
				<SectionTitle>{title}</SectionTitle>
			</SectionHeader>
			<SectionContent>
				<div>
					<span className='mr-1'>{trans("We have sent you the verification email.")}</span>
					<span>{trans("If you cannon find the email, please also check the spam folder.")}</span>
				</div>

				<div>{trans("If you have not received the email, please click on the button below.")}</div>

				{status ? <span className='text-positive font-medium'>{status}</span> : null}
			</SectionContent>

			<SectionFooter>
				<Button asChild={true}>
					<Link
						href={route("verification.send")}
						method='post'
					>
						{trans("Send again")}
					</Link>
				</Button>
			</SectionFooter>
		</Section>
	);
};

export default Index;
